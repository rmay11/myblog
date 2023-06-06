<?php
	function filterstr($value){
		if(!get_magic_quotes_gpc()){
			$value=addslashes($value);
			return $value;
		}
		return $value;
	}
	
	function redirect($ms ='', $url='', $text=''){
    echo <<<EOT
<meta http-equiv="refresh" content=$ms;URL=$url>
<div align="center">
<table width="600" border="0" cellpadding="1" cellspacing="1" class="tableoutline">
<tr>
   <td colspan="3"><table width="100%" border="0" cellpadding="5" cellspacing="1">
       <tr>
      <td valign="bottom"><div align="center">页面操作提示</div></td>
      </tr>
       <tr>
      <td><div align="center">$text</div></td>
      </tr>
       <tr>
      <td><div align="center"><a href="$url" mce_href="$url">本页面在 $ms 秒后自动跳转，如果您的浏览器没有跳转，点此链接返回。</a></div>
   </td>
      </tr>
   </table></td>
</tr>
   </table>
   </div>
EOT;
}
?>