let classes =['A組', 'B組', 'C組', 'D組']

for (let grade =1; grade<=3; grade++) {
    for ( let i=0; i< classes.length; i++){
        document.write( '<p>'+ grade + '年'　+classes[i]+'</p>');
    }

}
