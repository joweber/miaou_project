$('document').ready(function()
{
	$('.addticket').click(function()
	{
		$('.shorter').toggleClass('col-sm-4').toggleClass('col-sm-3');
		$('.panelticket').toggleClass('hidden');
	});

	// $.fn.scrollBottom = function() { 
	//   return $(document).height() - this.scrollTop() - this.height(); 
	// };

	$(function(){
		setInterval(function(){
			$('#display-group').load('home.phtml #display-group > div');
			$('#display-group').animate({scrollTop: $('#display-group')[0].scrollHeight});
		}, 5000);	
	});

	$(function(){
		setInterval(function(){
			$('.display-user').load('home.phtml .display-user > ul');
			$('.display-user').animate({scrollTop: $('.display-user')[0].scrollHeight});
		}, 5000);	
	});
			
	// window.onscroll = function() {myFunction()};

	// function myFunction() {
	// 	element = document.getElementById('display-group');
	// 	console.log(element);
	// 	element.scrollHeight - element.scrollTop === element.clientHeight;
	//     console.log(element.clientHeight);
	//     if (element.clientHeight === TRUE) {
	// 		$(function(){
	// 			setInterval(function(){
	// 				$('#display-group').load('home.phtml #display-group > p');
	// 				$('#display-group').animate({scrollTop: $('#display-group')[0].scrollHeight});
	// 			}, 10000);
	// 		});
	//     } else {
	// 		$(function(){
	// 			setInterval(function(){
	// 				$('#display-group').load('home.phtml #display-group > p');
	// 				$('#display-group').animate({scrollTop: $('#display-group')[0].scrollHeight});
	// 			}, 500);
	// 		});
	//     }
	// }

	// $("#element").scrollBottom();
});
function reste(texte)
{
    var restants=1022-texte.length;
    document.getElementById('caracteres').innerHTML=restants;
}
