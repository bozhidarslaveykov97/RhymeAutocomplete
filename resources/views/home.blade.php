<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="x-ua-compatible" content="IE=Edge"/>
  <title>Rhyme Autocomplete - Bozhidar Slaveykov</title>
  <link rel="stylesheet" href="css/style.css" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript">
  $(function(){
	  $("#editable").keyup(function(e){
		if (e.keyCode == 32 || e.keyCode == 13) {
		
			$.post("search",{ _token: "{{ csrf_token() }}", text: $(this).val() }).done(function(data) {

				var temp = [];

				$.each(data, function(key, value) {
				    temp.push(value);
				});
				
				temp.sort(function(a, b){
					return b.fontSize - a.fontSize;
				});
				
				var html = '';
				$.each(temp, function(key, rhymes) {
					html += '<b style="font-size:1'+rhymes.fontSize+'px">' + rhymes.word + '</b>, ';
			 	});
				$("#dropdown-autocomplete").html(html);
			});
			
		}
	});
  });
  </script>
  <style type="text/css">
	 .wrapper-full {
	 	padding:30px;
	 }
    header {
    	text-align:center;
    }
    #editable {
    	border-radius:4px;
    	width:60%;
    	height:700px; 
    	border: 1px solid #dfdfdf;
    	padding:5px;
    	float:left;
    	margin-right:15px;
    }
    .dropdown-autocomplete-wrapper {
	    background: #e1ffef;
		color: #000;
		border: 1px solid #94dafb;
		padding: 4px;
		border-radius: 4px;
		width: 36%;
		height:700px;
		float:left;
		overflow-x:scroll;
	}
  </style>
</head>
<body>
  <div class="wrapper-full">
    <header>
      <h2>Rhyme Autocomplete - Bozhidar Slaveykov</h2>
    </header>
    <div id="main">
      <textarea id="editable"></textarea>
    </div>
    <div class="dropdown-autocomplete-wrapper">
   	 <div id="dropdown-autocomplete"></div>
    </div>
  </div>
</body>
</html>
