<?php
$st= Think\Think::instance('SaeStorage'); 
 return array(
    'TMPL_PARSE_STRING'=>array(
        '/selectin/1/Public/uploads/buyer_logo' => $url=$st->getUrl('Public','uploads/buyer_logo') ,
        '/selectin/1/Public/uploads/buyer_pic' => $url=$st->getUrl('Public','uploads/buyer_pic') ,
        '/selectin/1/Public/uploads/supplier_company' => $url=$st->getUrl('Public','uploads/supplier_company') ,
        '/selectin/1/Public/uploads/supplier_pic' => $url=$st->getUrl('Public','uploads/supplier_pic')
    )
 );