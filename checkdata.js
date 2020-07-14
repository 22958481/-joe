function CheckFields()
{	if (document.form1.username.value == '') 
	{
		alert("帳號欄位不可以是空白!");
		document.form1.username.focus();
		return false;
	}
	if (document.form1.birth.value == '') 
	{
		alert("公司成立日期不可以是空白!");
	//	document.form1.username.focus();
		return false;
	}
	
	var f1 = document.form1.movie.checked;
	var f2 = document.form1.sudo.checked;
	var f3 = document.form1.read.checked;
	if (!f1 && !f2 && !f3)  
	{	alert("『興趣』欄位不可以是空白");
	//	document.fo總資產rm1.movie.focus();
		return false;
	}
	return true;
}