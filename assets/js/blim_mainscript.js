let suggestion = document.querySelector('input[name=showsuggestion]');
let vote = document.querySelector('input[name=vote]');
let last = document.querySelector('input#blim_options_check');
if (suggestion !== null) {
    suggestion.addEventListener('change', () => {
        if (last.value == 'vote' && vote.checked == true)
            last.value = 'both';
        else if (last.value == 'both' && vote.checked == true)
            last.value = 'vote';
        else if (last.value == 'none' && vote.checked == false)
            last.value = 'suggestion';
        else
            last.value = 'none';
    })
}
if (vote !== null) {
    vote.addEventListener('change', (e) => {
        if (last.value == 'suggestion' && suggestion.checked == true)
            last.value = 'both';
        else if (last.value == 'both' && suggestion.checked == true)
            last.value = 'suggestion';
        else if (last.value == 'none' && suggestion.checked == false)
            last.value = 'vote';
        else
            last.value = 'none';
    })
}

let vote_up = document.querySelector('input[name=voteup]');
let vote_down = document.querySelector('input[name=votedown]');

function get_uri() {
    return document.querySelector('input#ajax_vote_uri').value;
}

if (vote_up != null) {

    document.querySelector('span#vote-up').addEventListener('click', () => {
        send_fetch(parseInt(vote_up.value) + 1, vote_down.value);
    })
}
if (vote_down != null) {
    document.querySelector('span#vote-down').addEventListener('click', () => {
        send_fetch(vote_up.value, (parseInt(vote_down.value) + 1));
    })
}
function send_fetch(vote_up, vote_down) {
    var body = {
        'action': 'update_vote_count',
        'voteup':vote_up,
        'votedown':vote_down
    }
    // const request = new Request(ajax_object.ajax_url, {
    //     method: 'POST', 
    //     body: body});
    fetch(`${ajax_object.ajax_url}?action=update_vote_count&vote_up=${vote_up}&vote_down=${vote_down}&post_id=${parseInt(ajax_object.post_id)}`).then(response =>{
        if (response.status === 200) {
            return response.json();
          } else {
            throw new Error('Something went wrong on api server!');
          }
    }).then((response) => {
        console.debug(response);
    // console.log(fetch_uri);
    // console.log(parseInt(vote_up));
    // console.log(parseInt(vote_down));
    }).catch(error=>{
        console.error(error);
    })
    // document.querySelector('.voting-box').innerHTML = "<p>Thank you for voting</p>";
}

// jQuery(document).ready(function ($) {
//     // let $ = jQuery;
//     let vote_up = $('input[name=voteup]').value
//     let vote_down = $('input[name=votedown]').value;
//     $('span#vote-up').click(function () {
//         let vote_down_val = vote_down - 1;

//         if (vote_down_val < 0)
//             vote_down_val = 0;

//         send_post(vote_up,vote_down_val)
//     })
//     $('span#vote-down').click(function () {
//         let vote_up_val = vote_up + 1;

//         if (vote_up_val < 0)
//             vote_up_val = 0;

//         send_post(vote_up_val,vote_down)
//     })
//     function send_post(vote_up, vote_down) {
//         var data = {
//             'action': 'update_vote_count',
//             'post_id': ajax_object.post_id,
//             'vote_up': vote_up,
//             'vote_down': vote_down    // We pass php values differently!
//         };
//         // We can also pass the url value separately from ajaxurl for front end AJAX implementations
//         jQuery.post(ajax_object.ajax_url, data, function (response) {
//             alert(`Got this from the server: ${response} down: ${vote_down}, up: ${vote_up}`);
//             $('.voting-box').html("<p>Thank you for voting</p>");
// // }
//         });
//     }
// });