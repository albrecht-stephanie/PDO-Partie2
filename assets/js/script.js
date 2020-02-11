jQuery('#periodpickerstart').periodpicker({
    end: '#periodpickerend'
   });
   jQuery('#datetimepicker').periodpicker({
	norange: true, // use only one value
	cells: [1, 1], // show only one month

	resizeButton: false, // deny resize picker
	fullsizeButton: false,
	fullsizeOnDblClick: false,

	timepicker: true, // use timepicker
	timepickerOptions: {
		hours: true,
		minutes: true,
		seconds: false,
		ampm: true
	}
});
