$(document).ready(function()
{
	$(".btn").click(function()
	{
		$(".btn").toggleClass('active');
		$(".mob_menu_in").slideToggle(500);
	});

	setTimeout(function(){
		$(".loginalert").fadeOut();
	},3000);
});