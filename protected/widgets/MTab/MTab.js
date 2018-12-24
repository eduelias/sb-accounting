function tabs(){
		$('div.w_tabs ul li:first-child').addClass('active');
		$('div.w_contents div.w_tabSection').hide();
		$('div.w_contents div.w_tabSection:first-child').show();

		$('div.w_tabs ul.w_tab li').each(function(i){
			$(this).attr('id','wt'+i);
		});

		$('div.w_contents div.w_tabSection').each(function(i){
			$(this).attr('id','wc'+i);
		});

		$('ul.w_tab li').click(function(){
			var $li = $(this);
			var $id = $li.attr('id').replace('wt','');

			$li.parent().find('li').removeClass('active');
			$li.addClass('active');
			$('div.w_contents div.w_tabSection').hide();
			$('#wc'+$id).show();
		});
	}

	$(function(){
		tabs();
	});