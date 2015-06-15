(function()
{
	var pusher = new Pusher('db44e6f643901a1da9b8');

	var channel = pusher.subscribe('larabook');

	window.App = {};

	App.Notifier = function(){

			this.notify = function(message){

				var template = Handlebars.compile($('#flash-template').html());

				$(template({ message: 'You have a new follower' })).appendTo('body').fadeIn(300).fadeOut(6000);
			},
		
			this.inform = function(message){
				var template = Handlebars.compile($('#flash-template').html());

				$(template({ message: "A user updated his status" })).appendTo('body').fadeIn(300).fadeOut(6000);
				
			},

			this.check = function(message){
				var template = Handlebars.compile($('#flash-template').html());

				$(template({ message: "A user unfollowed you" })).appendTo('body').fadeIn(300).fadeOut(6000);
				
			}
		
	};

	channel.bind('userFollowsYou', function(data){
		var output = $('output');
		var count = parseInt(output.text());
		output.text(++count);

		(new App.Notifier).notify(data.title);
	});

	channel.bind('StatusWasPublished', function(data){
		alert('status');


		(new App.Notifier).inform(data.title);
	});

	channel.bind('userUnfollowsYou', function(data){
		var output = $('output');
		var count = parseInt(output.text());
		output.text(--count);

		(new App.Notifier).check(data.title);
	});
	
})();