$(function() {

$(".tx_nnaddress_search form select[name=tx_nnaddress_abclist\\[group\\]],.tx_nnaddress_search form select[name=tx_nnaddress_list\\[group\\]]").each(function() {
	$(this).on('change', function() {
		var curUrl = window.location.pathname;// + window.location.search;
		var el = $(this);
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: curUrl,
			data: {
				'type': 9323,
				'tx_nnaddress_list[group]': $(this).val(),
			}
		}).done(function(data) {
			var newEl = el.clone().insertAfter(el);
			newEl.find('option[value!=0]').remove();
			
			$(data).each(function(key, optData) {
				newEl.append(new Option(optData.title, optData.uid));
			});
		});
	});
});

});