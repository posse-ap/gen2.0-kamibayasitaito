<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Record;
use App\Language;
use App\Content;

class AppController extends Controller
{
    public function index()
    {
        // 今日の学習時間
        $today = Record::whereDate('study_date', date('Y-m-d'))->sum('study_time');

        // 今月の学習時間
        $month = Record::whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))->sum('study_time');

        // 合計学習時間
        $total = Record::sum('study_time');

        // 言語円グラフ（グラフで使うデータ）
        $langs = Record::leftJoin('languages', 'records.language_id', '=', 'languages.id')
            ->select('languages.name', DB::raw("SUM(records.study_time) as sum"), 'languages.colour')
            ->groupBy('languages.name', 'languages.colour')
            ->pluck("sum");
        // 言語円グラフ（ラベル）        
        $langs_labels = Language::pluck("name");
        // 言語円グラフ（色）        
        $langs_colours = Language::pluck("colour");


        // コンテンツ円グラフ（グラフで使うデータ、ラベル、色の取得）
        $contents = Record::leftJoin('contents', 'records.content_id', '=', 'contents.id')
            ->select('contents.name', DB::raw("SUM(records.study_time) as sum"), 'contents.colour')
            ->groupBy('contents.name', 'contents.colour')
            ->pluck("sum");
        // 言語円グラフ（ラベル）        
        $contents_labels = Content::pluck("name");
        // 言語円グラフ（色）        
        $contents_colours = Content::pluck("colour");

        // 棒グラフ
        $bar = Record::select(DB::raw("SUM(study_time) as sum"))
            ->whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))
            ->groupBy('study_date')
            ->orderBy('study_date')
            ->pluck("sum");

        $record = Record::all();
        $all_languages = Language::all();
        $all_contents = Content::all();

        return view('webapp', compact('today', 'month', 'total', 'langs', 'langs_labels', 'langs_colours', 'contents', 'contents_labels', 'contents_colours', 'bar', 'record', 'all_languages', 'all_contents'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'study_date' => 'required',
            'study_time' => 'required',
        ], [
            'study_date.required' => '学習日',
            'study_time.required'  => '学習時間',
        ]);

        $record = new Record();

        $content_array = $request->input('content_value');
        $lang_array = $request->input('lang_value');
        $study_time = $request->input('study_time');

        if (!empty($content_array) && !empty($lang_array)) {
            // コンテンツと言語を共に複数選択した場合、何に何時間かけたか判断できないためエラーメッセージを返す
            if (count($content_array) > 1 && count($lang_array) > 1) {
                session()->flash('fail', '学習コンテンツと学習言語をともに複数選択することはできません。');
            // コンテンツを複数選択した場合
            } elseif (count($content_array) > 1 && count($lang_array) === 1) {
                foreach ($content_array as $content) {
                    $record->create([
                        'study_date' => $request->input('study_date'),
                        'study_time' => $study_time / count($content_array),
                        'content_id' => $content,
                        'language_id' => $lang_array[0],
                    ]);
                }
            // 言語を複数選択した場合
            } elseif (count($lang_array) > 1 && count($content_array) === 1) {
                foreach ($lang_array as $lang) {
                    $record->create([
                        'study_date' => $request->input('study_date'),
                        'study_time' => $study_time / count($lang_array),
                        'content_id' => $content_array[0],
                        'language_id' => $lang,
                    ]);
                }
            // それ以外（どちらも一つずつ選ぶ想定で）
            } else {
                $record->create([
                    'study_date' => $request->input('study_date'),
                    'study_time' => $study_time / count($lang_array),
                    'content_id' => $content_array[0],
                    'language_id' => $lang_array[0],
                ]);
            }
            session()->flash('success', 'データが正常に追加されました。');
        } else {
            session()->flash('fail', '学習コンテンツ・学習言語を少なくとも一つ選択してください。');
        }




        return redirect('/top');
    }
}
