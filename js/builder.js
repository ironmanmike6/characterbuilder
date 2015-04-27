/**
 * Created by Michael on 4/23/2015.
 */

var proficiency = 0;

var clickSave = function(event) {
    var currentTarget = event.currentTarget;
    var parent = $(currentTarget).parent();
    var after = parent.siblings(".after");
    var label = $(after).children(".blank");
    var curVal = label.html();
    curVal = parseInt(curVal);


    if($(currentTarget).is(":checked")) { //becomes checked
        var newVal = curVal + proficiency;
        label.html((newVal<0?'':'+') + newVal);
        $(currentTarget).prop("checked", true);
    } else {
        var newVal = curVal - proficiency;
        label.html((newVal<0?'':'+') + newVal);
        $(currentTarget).prop("checked", false);
    }


}

var clickStat = function(event) {
    var currentTarget = event.currentTarget;

    var val = $(currentTarget).val();

    if(val <= 1) {
        $(currentTarget).val(1);
    }
    if(val % 2 == 1) {
        return;
    }

    var parent = $(currentTarget).parent();
    var after = parent.siblings(".after");
    var label = $(after).children(".box");
    var curVal = label.html();
    curVal = parseInt(curVal);

    var saveVal = (val - 10) / 2;

    label.html((saveVal<0?'':'+') +saveVal);


    var saves = $(parent).siblings("li").each( function() {
        var item = $(this).children("ul");
        var before =  $(item).children(".before");
        var checkbox = $(before).children(".saveCheckbox");
        var isChecked = $(checkbox).is(":checked");

        var after = $(item).children(".after");
        var label = $(after).children(".blank");
        var curVal = label.html();
        curVal = parseInt(curVal);

        curVal = saveVal + (isChecked ? proficiency: 0);
        label.html((curVal<0?'':'+') +curVal);
    }) ;
}

function setProficiency(prof) {
    proficiency = prof;
}

function setupStatistics() {
    $("#statisticsForm").change(function(event) {
        //event.preventDefault();

        $.ajax({

            url: "post/statistics-post.php",

            data: $("#statisticsForm").serialize(),

            method: "POST",

            success: function(data) {
                // Do something with the data we received
                console.log("saved");
            },

            error: function(xhr, status, error) {
                // Do something about the error that occurred

            }

        });
    });
}

function setupRaces() {
    $("#racebutton").click( function(event){
        event.preventDefault();
        $("#racebutton").hide(200);
        $("#racebutton").delay(250);
        $("#raceform").slideDown(300);

        });

}

function setupBox() {
    $("h2").click( function(event) {
        var currentTarget = event.currentTarget;
        var sibling = $(currentTarget).siblings("#infoform");
        sibling.toggle(800);
    });



}

function setup() {
   setupStatistics();
    setupBox();
    setupRaces();
}
