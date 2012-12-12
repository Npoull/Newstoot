var sources = [
		"http://allthingsd.com/category/product-reviews/feed/?callback=?",
		"http://www.theverge.com/rss/group/review/index.xml?callback=?"
];
		


var img = $("img");	
var snImage = $(".snimage");

/**
	Pre-prep
*/
var finalContent = [];				

for(var i = 0;i<sources.length;i++){
	var section = document.createElement("section");
	finalContent.push(section);
}



$(document).ready(function(){
	grabContent();
	processArticles();
	adjustImages();

	if(window.location.hash !== ""){
		//read the hash to make see if we need to laod a article
	var hash = window.location.hash.replace("#/","");
	
	loadArticle("http://localhost:8888/"+hash);
	}
	
	
	$("#s").attr("placeholder","Enter a search term");
	
});


function grabContent(){
		//grab articles
	for(var i = 0;i<finalContent.length;i++){
		fetch(sources[i],function(d){})
		
		
	}
}

function fetch(_url,callback){
    var data = null;

	var article = document.createElement("section");
    $.ajax({
    	url:"/fetch",
    	dataType:"json",
    	data:{
    		"url":_url
    	},
    	success:function(d){
	    	
    	}
    	
    })
    
    
}

function fetch2(){
	 $.ajax({
    	url:"/fetch2",
    	dataType:"json",
    
    	success:function(d){
	    	console.log(d);
    	}
    	
    })

}


function processArticles(){
	var articles = $(".article");
	console.log(articles.length);
	for(var i = 0;i<articles.length;i++){
		var clip = articles[i];
		console.log(clip);
		//title
		var title = document.createElement("h1");
		title.className = "article-title";
		//title.innerHTML = clip.getAttribute("data-title");
		
		var url = document.createElement("a");
		url.href = "#/"+clip.getAttribute("data-title");
		url.className = "article-link";
		url.innerHTML = clip.getAttribute("data-title");
	
		
		
		url.appendChild(title);
		
		clip.appendChild(url);
		clip.addEventListener("click",function(){
			loadArticle(this.getAttribute("data-permalink"));
		});
		
		
		
	}
	
}

$(".article").on("click",function(e){
	var link = e.target.children;
	
	console.log(link);
	//loadArticle(this.getAttribute("data-permalink"));
	
})

function loadArticle(url){
	console.log(url);
	$("#overlay").fadeIn("slow");
	
	$.ajax({
		url:url,
		success:function(d){
			$("#overlay").append(d);
			$(".close").fadeIn("slow");
		}
	})
	
}

$(window).load(function(){
	
});

$(".close").on("click",function(){
	$("#overlay").fadeOut("slow",function(){
		$(".close").fadeOut();
		$(this).html("");
	})
})

/**
	Adjust images so they work better
*/
function adjustImages(){
	delete img.height;
	delete img.width;
	snImage.css("display","inline-block");

	
	
}