(function($){
	$.fn.mInput = function(options){
        mInput(this,options);
    }

    $.mInput = function(options){
        $(options).each(function(){
            if(typeof this.element=='undefined') return;
            mInput(this.element,this);
        });
    }

    function mInput(element,options){
    	var ajaxRequest = null;
    	var ajaxRequestSent = false;
    	var $input = $(element);
    	var $li = $input.parent();
    	var $results = $li.parent().find('.results');
    	var $choosen = $li.parent().find('.choosen');

    	options = $.extend({
            //q:$element.val(), Inserir opções com valores padrões, se necessário
        },options);

        $input.bind('keyup click',function(e){
        	var $rWidth = 300;

        	if($input.val()=='') return;

        		if(e.keyCode==13){
        			e.preventDefault();
        			$results.find('li:visible:first-child').click();
        		}

 
        			if(ajaxRequestSent){
        				ajaxRequest.abort();
        			}

		        	ajaxRequestSent = true;
		        	ajaxRequest = $.getJSON(options.url,{q:$input.val()},function(data){
		        		$callback = '<ul>';
		        		$.each(data, function(i, item) {
		    					$callback += '<li style="width:'+ $rWidth +'px;"><div class="liResult">';
								$callback += (item.image != undefined) ? '<img src="'+item.image+'" alt="" />' : '';
			    				$callback +=  item.title;
			    				$callback += (item.description != undefined) ? '<div class="description">'+item.description+'</div>' : '';
			    				$callback += '<input type="hidden" name="value" class="value" value="'+item.value+'" />';
			    				$callback += '</div></li>';
						});

						$callback += '</ul>';

						$results.html($callback).show();

						$results.find('li').unbind('click');
				        $results.find('li').click(function(e){
				        	$result = $(this);

				        	$html  = $result.html();
				        	$html += '<a href="javascript:void(0);" class="magicInputRemove">Editar</a>';

				        	$choosen.html($html).show();
				        	$input.val($result.find("input").val()).hide();
				        	$results.hide();

				        	$choosen.find('a.magicInputRemove').click(function(){
				        		$input.val('').show();
				        		$choosen.html('').hide();
				        	});
				        });
		        });        	
        });

    }

})(jQuery);

/*

function magicInputClick(){
		$('div.w_magicInput ul li.results ul li').unbind('click');
		$('div.w_magicInput ul li.results ul li').click(function(){
			var $result = $(this);
			var $box = $(this).parent().parent();
			var $html = $result.find('input.value').val();

			$html += '<br /><a href="javascript:void(0);" class="magicInputRemove">[x] Remover</a>';

			var $input = $result.parent().parent().parent().find('li.input input').val($html);
			var $choosen = $input.parent().parent().find('.choosen').html($result);

			$box.hide();
			$input.hide();
			$choosen.show();
		});

		$('a.magicInputRemove').unbind('click');
		$('a.magicInputRemove').click(function(){
			$a = $(this);
		});
	}

	$(function(){
			$('div.w_magicInput ul li.input input').keydown(function(){
				var $input 		= $(this);
				var $li 		= $input.parent();
				var $results 	= $li.parent().find('.results');
				var $choosen	= $li.parent().find('.choosen');

				$results.show();

				$callback = '<ul>';
				$.getJSON(mInputUrl,{},function(keywords){
					keywords = [{'title':'Tomate','value':'123'}];
					for(var i = 0; i < keywords.length; i++){
						$callback += '<li><div class="liResult">';
						$callback += (keywords[i].image != undefined) ? '<img src="'+keywords[i].image+'" alt="" />' : '';
	    				$callback += keywords[i].title;
	    				$callback += (keywords[i].description != undefined) ? '<div class="description">'+keywords[i].description+'</div>' : '';
	    				$callback += '<input type="hidden" name="value" class="value" value="'+keywords[i].value+'" />';
	    				$callback += '</div></li>';
					}
					$callback += '</ul>';

					$results.html($callback);
					magicInputClick();
				});
			});
	});
	*/