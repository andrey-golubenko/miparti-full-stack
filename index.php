<?php $URIreq = $_SERVER['REQUEST_URI'];
if ( preg_match('/\.(jpg|jpeg|gif|png|zip)(\?.+)?$/', $URIreq ) ){

    $PathToFileFromRoot = $_SERVER['DOCUMENT_ROOT'].$URIreq;
    $PathToFileFromRoot = str_replace( '//', '/', $PathToFileFromRoot );
    if ( !file_exists($PathToFileFromRoot) ){
        echo "<div style='margin:100px 10% 0 10%; padding:20px; text-align:center; border:1px solid #42A6FF; background:#DEF0FF; white-space:nowrap;'>
		<b>File not found:</b> $URIreq<br>
		<b>From Page:</b> <a href='{$_SERVER["HTTP_REFERER"]}'>{$_SERVER["HTTP_REFERER"]}</a><br>
		<div style='font-size:25px; padding-top:30px;'>Go to WebSite: <a href='http://{$_SERVER['HTTP_HOST']}'>http://{$_SERVER['HTTP_HOST']}</a></div>
		</div>";
        exit();
    }
}

echo "This is index-page - highly likely Studio_Page";