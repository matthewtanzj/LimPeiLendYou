function sortGroups(array) {
	var resultString = "";
  	for (var i = 1; i < arguments.length; i++) {
  		if (i != arguments.length - 1) {
  			resultString += (arguments[i](array) + ",");
  		} else {
  			resultString += arguments[i](array);
  		}
	}
	return resultString;
}

function sortByN(n, array) {
	function helper(array) {
		var resultString = "";
		for (var i = n - 1; i < array.length; i+=n) {
			resultString += array[i];
		}
		return resultString;
	}
	return helper;
}

function sortByComposite(n, m, array) {
	return sortByN(n*m, array);
} 

function generateArray(n) {
	var array = new Array();
	for (var i = 0; i < n; i++) {
		array.push(i);
	}
	return array;
}