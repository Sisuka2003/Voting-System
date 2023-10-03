
function startTrial(){
    var gettopright=document.getElementById("party-trail");
    
    gettopright.className="party-trial";
}

function startTrial2(){
    var gettopright=document.getElementById("member-trial");
    
    gettopright.className="member-trial";
    
}

function dismissTrial(){
    var gettopright=document.getElementById("party-trail");
    var getbtright=document.getElementById("member-trial");
    
    gettopright.className="party-trial-non";
    
    getbtright.className="member-trial-non";
}