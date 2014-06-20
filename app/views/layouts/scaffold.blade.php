<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
		</style>

<!--[if IE]>
   <style>
      .rotate_text
      {
         writing-mode: tb-rl;
         filter: flipH() flipV();
      }
   </style>
<![endif]-->
<!--[if !IE]><!-->
   <style>
      .rotate_text
      {
         -moz-transform:rotate(-90deg); 
         -moz-transform-origin: top left;
         -webkit-transform: rotate(-90deg);
         -webkit-transform-origin: top left;
         -o-transform: rotate(-90deg);
         -o-transform-origin:  top left;
          position:relative;
         top:20px;
         left:40px;
         margin-left:-40px;
      }
   </style>
<!--<![endif]-->

   <style>  
      table
      {
         /*border: 1px solid black;*/
         /*table-layout: fixed;*/
         /*width: 69px; Table width must be set or it wont resize the cells*/
      }
      th, td 
      {
          /*border: 1px solid black;*/
          /*width: 23px;*/
      }
      th.rotated_cell
      {
      	 width:25px;
         height:80px;
         vertical-align:bottom;
         line-height: 14px;
      }
      td.rotated_cell
      {
      	 width:25px;
         vertical-align:bottom
      }
   </style>


	</head>

	<body>

		<div class="container">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>

	</body>

</html>