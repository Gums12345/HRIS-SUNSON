<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 <script src="admin/js/jquery.min.js"></script>

</head>

<body>
<button id="start_button">Start</button>

	<div id='progressbar-wrapper' style="position: fixed;top: 80px;display: block;margin: 0 auto;width: 100%;height: 30px;opacity: 1;zIndex: 9998">
		<div id='progressbar-outer' style="display: table;margin: 0 auto;background-color: #FFFFFF;border: 5px solid #000000;width: 50%;height: 30px;opacity: 1;zIndex: 9998">
			<div id='progressbar' style="float:left: 50;width: 0;height: 30px;background-color:#000000;border: 0;opacity: 1;zIndex: 99999">
			</div>
		</div>
	</div>

	<div id="loading-animation" style="position: fixed;top: 150px;left: 0;height: 120px;width: 100%;font-size: 100px;line-height: 120px;text-align: center;color: #000000;zIndex: 9999;">
	    ...loading...<br /><small>Please be patient.</small>
	</div>
</body>
</html>
<script language="javascript">
var progressbar = {};

$(function () {
	progressbar = {

        /** initial progress */
        progress: 0,

        /** maximum width of progressbar */
        progress_max: 0,

        /** The inner element of the progressbar (filled box). */
        $progress_bar: $('#progressbar'),

        /** Method to set the progressbar.
         */
        set: function (num) { 
            var deferred = $.Deferred(); 
            if (this.progress_max && num) {
                this.progress = num / this.progress_max * 100;
                //console.log('percent: ' + this.progress + '% - ' + num + '/' + this.progress_max);
                 
                var self = this; 
                self.$progress_bar.animate({"width": String(this.progress) + '%'}, function() {  
                    deferred.resolve(); 
                }); 
                return deferred; 
            }
        }

	};

});


$('#start_button').on('click', function () {

	var iterations = 100;
    var i = 0; 
	progressbar.progress_max = iterations;
    
    var loop = function(){
        i+=1; 
        if(i <= iterations){
            progressbar.set(i).then(function(){ 
                loop(); 
            }); ;         
        }
    }; 
    
	loop();

});
</script>