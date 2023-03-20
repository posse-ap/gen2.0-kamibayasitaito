@extends('layouts.app')

@section('header_scripts')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
@endsection

@section('content')
    <div style="text-align: center">
        @if ($errors->any())
            <p class="alert alert-danger">@foreach ($errors->all() as $error) {{ $error }} @endforeach を記入しましょう</p>
        @endif
        @if (session()->has('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if (session()->has('fail'))
            <p class="alert alert-danger">{{ session('alert') }}</p>
        @endif
    </div>
    <!-- MAIN -->
    <div class="main_section" id="main_section">
        <!-- LEFT -->
        <div class="left">
            <!-- TOP LEFT -->
            <div class="top_left">
                <div class="hour">
                    <h2 class="hour_title">Today</h2>
                    <h1 class="hour_number">{{ $today }}</h1>
                    <h2 class="hour_hour">hours</h2>
                </div>
                <div class="hour">
                    <h2 class="hour_title">Month</h2>
                    <h1 class="hour_number">{{ $month }}</h1>
                    <h2 class="hour_hour">hours</h2>
                </div>
                <div class="hour">
                    <h2 class="hour_title">Total</h2>
                    <h1 class="hour_number">{{ $total }}</h1>
                    <h2 class="hour_hour">hours</h2>
                </div>
            </div>
            <!-- BOTTOM LEFT -->
            <div class="bottom_left">
                <!-- <div id="column" class="column"></div> -->
                <div class="column_cont">
                    <canvas id="column" class="column"></canvas>
                </div>
            </div>
        </div>
        <!-- RIGHT -->
        <div class="right">
            <div class="donut">
                <h1 class="gakushu">学習言語</h1>
                <canvas id="donut_lang"></canvas>
                <div class="legend_cont_lang">
                    <div class="legend">
                        <div class="legend_circle html_circle"></div>
                        <p>HTML</p>
                    </div>
                    <div class="legend">
                        <div class="legend_circle css_circle"></div>
                        <p>CSS</p>
                    </div>
                    <div class="legend">
                        <div class="legend_circle sql_circle"></div>
                        <p>SQL</p>
                    </div>
                    <div class="legend">
                        <div class="legend_circle shell_circle"></div>
                        <p>Shell</p>
                    </div>
                    <div class="legend">
                        <div class="legend_circle js_circle"></div>
                        <p>Javascript</p>
                    </div>
                    <div class="legend">
                        <div class="legend_circle other_circle"></div>
                        <p>その他</p>
                    </div>
                    <div class="legend">
                        <div class="legend_circle php_circle"></div>
                        <p>PHP</p>
                    </div>
                    <div class="legend">
                        <div class="legend_circle laravel_circle"></div>
                        <p>Laravel</p>
                    </div>
                </div>
            </div>

            <div class="donut">
                <h1 class="gakushu">学習コンテンツ</h1>
                <canvas id="donut_content"></canvas>
                <div class="legend_cont_content">
                    <div class="legend">
                        <div class="legend_circle n_circle"></div>
                        <p>N予備校</p>
                    </div>
                    <div class="legend">
                        <div class="legend_circle kadai_circle"></div>
                        <p>課題</p>
                    </div>
                    <div class="legend">
                        <div class="legend_circle dot_circle"></div>
                        <p>ドットインストール</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- BOTTOM -->
        <div class="bottom">
            <div class="arrow_back"></div>
            <p class="date">2022年3月</p>
            <div class="arrow_next"></div>
            <div class="mobile_modal">
                <a href="#" id="mobile_modalbtn">記録・投稿</a>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <div class="modal_bg">
        <div class="modal_inner" id="modal">
            <form action="{{ route('add_record') }}" method="post">
                @csrf
                <div class="modal_wrapper">
                    <div class="modal_left" id="modal_left">
                        <div class="modal_day">
                            <h1 class="modal_title">学習日</h1>
                            <input name="study_date" type="text" class="textbox_small" id="datepicker">
                        </div>
                        <div class="modal_content">
                            <h1 class="modal_title">学習コンテンツ（複数選択可）</h1>
                            <div class="option_cont">
                                @foreach ($all_contents as $content)
                                    <div class="option content_op" id="content{{ $content->id }}">
                                        <input id="content_box{{ $content->id }}" name="content_value[]"
                                            value="{{ $content->id }}" type="checkbox" style="display: none">
                                        <label id="content_label{{ $content->id }}" for="content_box{{ $content->id }}"
                                            class="circle_gray circle_content">
                                            <div class="arrow_check"></div>
                                        </label>
                                        <p class="label">{{ $content->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal_lang">
                            <h1 class="modal_title">学習言語（複数選択可）</h1>
                            <div class="option_cont">
                                @foreach ($all_languages as $language)
                                    <div class="option lang_op" id="language{{ $language->id }}">
                                        <input id="language_box{{ $language->id }}" name="lang_value[]"
                                            value="{{ $language->id }}" type="checkbox" style="display: none">
                                        <label id="language_label{{ $language->id }}"
                                            for="language_box{{ $language->id }}" class="circle_gray circle_lang">
                                            <div class="arrow_check"></div>
                                        </label>
                                        <p class="label">{{ $language->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- MODAL RIGHT -->
                    <div class="modal_right" id="modal_right">
                        <div class="modal_time">
                            <h1 class="modal_title">学習時間</h1>
                            <input name="study_time" type="number" step="0.1" class="textbox_small">
                        </div>
                        <div class="modal_twitter">
                            <h1 class="modal_title">Twitter用コメント</h1>
                            <textarea id="tweetBox" cols="51" rows="10" class="tweet_area"></textarea>
                        </div>
                        <div class="modal_twitter_share">
                            <input id="twitter_circle" type="checkbox" style="display: none">
                            <label id="twitter_label" for="twitter_circle" class="twitter_circle">
                                <div class="arrow_check_twitter"></div>
                            </label>
                            <span id="tweet">Twitterにシェアする</span>
                        </div>
                    </div>
                </div>
                <!-- MODAL BOTTOM -->
                <div class="modal_bottom" id="modal_bottom">
                    <!-- <a href="#modal" id="bottom_btn">記録・投稿</a> -->
                    <button type="submit" id="bottom_btn">記録・投稿</button>
                </div>
            </form>

            <!-- X BUTTON -->
            <div class="x" id="close"></div>
            <!-- LOADER -->
            <div class="loader" id="loader"></div>
            <!-- 完了画面-->
            <div class="complete" id="complete">
                <h1 class="complete_title">AWESOME!</h1>
                <div class="complete_check"></div>
                <div class="complete_circle"></div>
                <h1 class="complete_msg">記録・投稿<br>完了しました</h1>
            </div>

        </div>
    </div>
    <!-- MOBILE MODAL -->
    <div class="mobilemodal_bg">
        <div class="mobilemodal_inner" id="mobilemodal">
            <div class="mobilemodal_wrapper" id="mobilemodal_wrapper">
                <div class="mobilemodal_day">
                    <h1 class="mobilemodal_title">学習日</h1>
                    <input type="text" class="textbox_small" id="">
                </div>
                <div class="mobilemodal_content">
                    <h1 class="mobilemodal_title">学習コンテンツ（複数選択可）</h1>
                    <div class="option_cont">
                        <div class="option mobilecontent_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_content"></div>
                            <p class="label">N予備校</p>
                        </div class="option">
                        <div class="option mobilecontent_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_content"></div>
                            <p class="label">ドットインストール</p>
                        </div class="option">
                        <div class="option mobilecontent_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_content"></div>
                            <p class="label">POSSE課題</p>
                        </div class="option">
                    </div>
                </div>
                <div class="mobilemodal_lang">
                    <h1 class="mobilemodal_title">学習言語（複数選択可）</h1>
                    <div class="option_cont">
                        <div class="option mobilelang_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_lang"></div>
                            <p class="label">HTML</p>
                        </div>
                        <div class="option mobilelang_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_lang"></div>
                            <p class="label">CSS</p>
                        </div class="option">
                        <div class="option mobilelang_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_lang"></div>
                            <p class="label">Javascript</p>
                        </div class="option">
                        <div class="option mobilelang_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_lang"></div>
                            <p class="label">PHP</p>
                        </div class="option">
                        <div class="option mobilelang_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_lang"></div>
                            <p class="label">Laravel</p>
                        </div class="option">
                        <div class="option mobilelang_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_lang"></div>
                            <p class="label">SQL</p>
                        </div class="option">
                        <div class="option mobilelang_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_lang"></div>
                            <p class="label">SHELL</p>
                        </div class="option">
                        <div class="option mobilelang_op">
                            <div class="arrow_check"></div>
                            <div class="circle_gray mobilecircle_lang"></div>
                            <p class="label">情報システム基礎知識（その他）</p>
                        </div class="option">
                    </div>
                </div>
                <div class="mobilemodal_time">
                    <h1 class="mobilemodal_title">学習時間</h1>
                    <input type="text" class="textbox_small" id="">
                </div>
                <div class="mobilemodal_twitter">
                    <h1 class="mobilemodal_title">Twitter用コメント</h1>
                    <input type="text" class="textbox_large">
                </div>
                <div class="mobilemodal_twitter_share">
                    <div class="arrow_check_twitter"></div>
                    <div class="twitter_circle"></div>
                    <p class="twitter_text">Twitterにシェアする</p>
                </div>
                <div class="mobile_modal">
                    <a href="#mobile_modal" id="mobile_modalbtn2">記録・投稿</a>
                </div>
            </div>
            <!-- X BUTTON -->
            <div class="x_mobile" id="closemobile"></div>
            <!-- LOADER -->
            <div class="loader_mobile" id="loader_mobile"></div>
            <!-- 完了画面-->
            <div class="complete" id="complete_mobile">
                <h1 class="complete_title">AWESOME!</h1>
                <div class="complete_check"></div>
                <div class="complete_circle"></div>
                <h1 class="complete_msg">記録・投稿<br>完了しました</h1>
            </div>
        </div>
    </div>
@endsection

@section('body_scripts')
    <script>
        // js にコントローラで定義したブレード変数を渡している
        const bar_data = @json($bar);
        const langs_data = @json($langs);
        const langs_labels = @json($langs_labels);
        const langs_colours = @json($langs_colours);
        const contents_data = @json($contents);
        const contents_labels = @json($contents_labels);
        const contents_colours = @json($contents_colours);
        const month = @json($month);
    </script>
    <script src="webapp.js"></script>
    <script src="graphs.js"></script>
@endsection

</html>
