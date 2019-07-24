<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="x-ua-compatible" content="IE=Edge"/>
  <title>Rhyme Autocomplete - Bozhidar Slaveykov</title>
  <link rel="stylesheet" href="css/style.css" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript">
  (function ($, undefined) {
	  $.fn.caret = function (begin, end)
	    {
	        if (this.length == 0) return;
	        if (typeof begin == 'number')
	        {
	            end = (typeof end == 'number') ? end : begin;
	            return this.each(function ()
	            {
	                if (this.setSelectionRange)
	                {
	                    this.setSelectionRange(begin, end);
	                } else if (this.createTextRange)
	                {
	                    var range = this.createTextRange();
	                    range.collapse(true);
	                    range.moveEnd('character', end);
	                    range.moveStart('character', begin);
	                    try { range.select(); } catch (ex) { }
	                }
	            });
	        } else
	        {
	            if (this[0].setSelectionRange)
	            {
	                begin = this[0].selectionStart;
	                end = this[0].selectionEnd;
	            } else if (document.selection && document.selection.createRange)
	            {
	                var range = document.selection.createRange();
	                begin = 0 - range.duplicate().moveStart('character', -100000);
	                end = begin + range.text.length;
	            }
	            return { begin: begin, end: end };
	        }
	    }
	})(jQuery);
  
  $(function(){
	  $("#editable").keyup(function(e){
		if (e.keyCode == 32 || e.keyCode == 13) {
		  console.log($(this).val());
		  
		  $("#dropdown-autocomplete").html($(this).val());
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
		width: 37%;
		height:700px;
		float:left;
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
