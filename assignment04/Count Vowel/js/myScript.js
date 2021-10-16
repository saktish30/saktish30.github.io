function go(){
	var str = document.getElementById("t1").value;
	var vowel = "aeiouAEIOU";
	var ctr = 0;

	for(var x=0;x<str.length;x++){
		for(var y=0;y<vowel.length;y++){
			if(str[x]==vowel[y])
			{
				ctr++;
			}
		}
	}
	document.getElementById("p1").innerHTML="The Number of Vowel in Textbox is "+ ctr;
}