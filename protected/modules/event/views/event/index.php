<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/fullcalendar/fullcalendar/fullcalendar.js"); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/js/fullcalendar/fullcalendar/fullcalendar.css"); ?>

<script>

	$(document).ready(function() {

		var standardUrl = "<?php echo $this->createUrl('event/'); ?>";
		var loadUrl = "<?php echo $this->createUrl('event/load'); ?>";
		
		var user_type = "<?php if(Yii::app()->user->IsGuest) echo "Guest"; else echo User::model()->findByPK(Yii::app()->user->id)->userType->type_name; ?>";
		
		if(false) {
			
			var disableDragging = true;
			var disableResizing = true;
			var editable = false;
			
		} else {
			
			var disableDragging = false;
			var disableResizing = false;
			var editable = true;
			
		}
		
	    // page is now ready, initialize the calendar...
	    $('#calendar').fullCalendar({
	        // put your options and callbacks here
			header: {
				left: "title",
				right: "prev,next today month,agendaWeek,agendaDay"
			},
			selectable: true,
			selectHelper: true,
			select: selectFunc = function(start, end, allDay) {
				window.location = standardUrl + "/create/start/" + start + "/end/" + end;
				calendar.fullCalendar("unselect");
			},
			editable: true,
			events: loadUrl,
			firstDay: 1,
			eventDrop: eventDropFunc = function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {
				window.location = standardUrl + "/update/id/" + event.id + "/start/" + event.start + "/end/" + event.end;
			},
			eventResize: eventResizeFunc = function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view) {
				window.location = standardUrl + "/update/id/" + event.id + "/start/" + event.start + "/end/" + event.end;
			},
			eventClick: eventClickFunc = function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {
				window.location = standardUrl + "/update/id/" + event.id;
			},
			disableDragging: disableDragging,
			disableResizing: disableResizing,
			editable: editable
	    })

	});
	

</script>

<div id="calendar"></div>