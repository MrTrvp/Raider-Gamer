function randomString()
{
	var chars = "0123456789abcdefghiklmnopqrstuvwxyz";
	var randomString = '';

	for (var i = 0; i < 18; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomString += chars.substring(rnum, rnum + 1);
	}

	document.getElementsByClassName("UDID")[0].value = randomString;
}

function switchTabs(selectedPage, gameSC)
{
	var tabNames = [ 'home', 'mission', 'fight', 'item', 'group' ];
	var pagesNames = [ 'home', 'missions', 'fight', 'equipment', 'group' ];
	
	for (var i = 0; i < tabNames.length; i++)
	{
		var tabName = tabNames[i];
		var pageName = pagesNames[i];

		var pageElement = document.getElementsByClassName(tabName)[0];
		var frameElement = document.getElementsByClassName('gameFrame')[0];

    	pageElement.src = ''.concat('http://im.storm8.com/images/tab/tab_', tabName, (selectedPage == pageName) ? '_selected' :  '', '.png');
		frameElement.src = ''.concat('http://', gameSC, '.storm8.com/', selectedPage, '.php');
	}
}