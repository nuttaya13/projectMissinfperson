 $(document).ready(function () {
	 
 	$(".ts-sidebar-menu li a").each(function () {
 		if ($(this).next().length > 0) {
 			$(this).addClass("parent");
 		};
 	})
 	var menux = $('.ts-sidebar-menu li a.parent');
 	$('<div class="more"><i class="fa fa-angle-down"></i></div>').insertBefore(menux);
 	$('.more').click(function () {
 		$(this).parent('li').toggleClass('open');
 	});
	$('.parent').click(function (e) {
		e.preventDefault();
 		$(this).parent('li').toggleClass('open');
 	});
 	$('.menu-btn').click(function () {
 		$('nav.ts-sidebar').toggleClass('menu-open');
 	});
	 
	 
	 $('#zctb').DataTable();
	 
	 
	 $("#input-43").fileinput({
		showPreview: false,
		allowedFileExtensions: ["zip", "rar", "gz", "tgz"],
		elErrorContainer: "#errorBlock43"
			// you can configure `msgErrorClass` and `msgInvalidFileExtension` as well
	});

 });

 Highcharts.chart('container', {
	chart: {
	  plotBackgroundColor: null,
	  plotBorderWidth: null,
	  plotShadow: false,
	  type: 'pie'
	},
	title: {
	  text: 'Browser market shares in January, 2018'
	},
	tooltip: {
	  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	},
	accessibility: {
	  point: {
		valueSuffix: '%'
	  }
	},
	plotOptions: {
	  pie: {
		allowPointSelect: true,
		cursor: 'pointer',
		dataLabels: {
		  enabled: true,
		  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
		}
	  }
	},
	series: [{
	  name: 'Brands',
	  colorByPoint: true,
	  data: [{
		name: 'Chrome',
		y: 61.41,
		sliced: true,
		selected: true
	  }, {
		name: 'Internet Explorer',
		y: 11.84
	  }, {
		name: 'Firefox',
		y: 10.85
	  }, {
		name: 'Edge',
		y: 4.67
	  }, {
		name: 'Safari',
		y: 4.18
	  }, {
		name: 'Sogou Explorer',
		y: 1.64
	  }, {
		name: 'Opera',
		y: 1.6
	  }, {
		name: 'QQ',
		y: 1.2
	  }, {
		name: 'Other',
		y: 2.61
	  }]
	}]
  });
