<!DOCTYPE html>    
<head>
    <meta charset="utf-8">
    <title>fabric.js-simple text display</title>
	
	<!-- Get version 1.1.0 of Fabric.js from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.1.0/fabric.all.min.js" ></script>
 
	<!-- Get the highest 1.X version of jQuery from CDN. Required for ready() function. -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
 
<body>
		<canvas id="c" class="upper-canvas " width="600" height="500" style="position: absolute; width: 600px; height: 500px; left: 0px; top: 0px; -webkit-user-select: none; cursor: default;"></canvas>
</body>
 
<script>
	// Place script tags at the bottom of the page.
	// That way progressive page rendering and 
	// downloads are not blocked.
 
	// Run only when HTML is loaded and 
	// DOM properly initialized (courtesy jquery)
	$(function() {
		  var canvas = this.__canvas = new fabric.Canvas('c');
			
			var HH = 100;
			var HV = 250;
			
		  var start2Points = [
			{x: 0, y: 0},
			{x: 0, y: 50},
			{x: 100, y: 50},
			{x: 100, y: 250},
			{x: 150, y: 250},
			{x: 150, y: 50},
			{x: 250, y: 50},
			{x: 250, y: 0}
		  ];
		  
		  var startPoints = [
			{x: 0, y: 0},
			{x: 0, y: 50},
			{x: 100, y: 50},
			{x: 100, y: 250},
			{x: 150, y: 250},
			{x: 150, y: 50},
			{x: 250, y: 50},
			{x: 250, y: 0}
		  ];

		  var clonedStartPoints = startPoints.map(function(o){
			return fabric.util.object.clone(o);
		  });

		  var polygon = new fabric.Polygon(clonedStartPoints, {
			left: 100,
			top: 200,
			fill: 'rgba(42, 44, 44, 0.9)',
			selectable: false
		  });
		  canvas.add(polygon);
		  
		  var rect = new fabric.Rect({
			left: 150,
			top: 200,
			originX: 'left',
			originY: 'top',
			width: 150,
			height: 60,
			angle: 0,
			fill: 'rgba(255,0,0,0.5)',
			transparentCorners: false
		  });

		  canvas.add(rect).setActiveObject(rect);

		  function observeBoolean(property) {
			document.getElementById(property).onclick = function() {
			  canvas.item(0)[property] = this.checked;
			  canvas.renderAll();
			};
		  }

		  function observeNumeric(property) {
			document.getElementById(property).onchange = function() {
			  canvas.item(0)[property] = this.value;
			  canvas.renderAll();
			};
		  }

		  function observeOptionsList(property) {
			var list = document.querySelectorAll('#' + property + 
			' [type="checkbox"]');
			for (var i = 0, len = list.length; i < len; i++) {
			  list[i].onchange = function() {
				canvas.item(0)[property](this.name, this.checked);
				canvas.renderAll();
			  };
			};
		  }

		  observeBoolean('hasControls');
		  observeBoolean('hasBorders');
		  observeBoolean('hasRotatingPoint');
		  observeBoolean('visible');
		  observeBoolean('selectable');
		  observeBoolean('evented');
		  observeBoolean('transparentCorners');
		  observeBoolean('centeredScaling');
		  observeBoolean('centeredRotation');

		  observeNumeric('padding');
		  observeNumeric('cornerSize');
		  observeNumeric('rotatingPointOffset');
		  observeNumeric('borderColor');
		  observeNumeric('cornerColor');

		  observeOptionsList('setControlVisible');
		})();
</script>
		
</head>
 
 
</html>