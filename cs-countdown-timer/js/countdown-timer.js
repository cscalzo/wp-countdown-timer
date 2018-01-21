jQuery(document).ready(function($) {
	var sourceTargetDate = $('.countdown-timer-wrapper').data('target-date');
	var targetDate = new Date(sourceTargetDate).getTime();

	window.setInterval(function() {
		var nowDate = new Date().getTime();
		var distance = targetDate - nowDate;

		var daysRemaining = Math.floor( distance / (1000*60*60*24));
		var hoursRemaining = Math.floor( (distance % (1000*60*60*24)) / (1000*60*60) );
		var minutesRemaining = Math.floor( (distance % (1000*60*60)) / (1000*60) );
		var secondsRemaining = Math.floor( (distance % (1000*60)) / 1000 );

		// is the count down less then 0?
		daysRemaining = daysRemaining < 0 ? 0 : daysRemaining;
		hoursRemaining = hoursRemaining < 0 ? 0 : hoursRemaining;
		minutesRemaining = minutesRemaining < 0 ? 0 : minutesRemaining;
		secondsRemaining = secondsRemaining < 0 ? 0 : secondsRemaining;

		$('.countdown-timer-wrapper .days .countdown-value').text(daysRemaining);
		$('.countdown-timer-wrapper .hours .countdown-value').text(hoursRemaining);
		$('.countdown-timer-wrapper .minutes .countdown-value').text(minutesRemaining);
		$('.countdown-timer-wrapper .seconds .countdown-value').text(secondsRemaining);

	}, 1000);

});