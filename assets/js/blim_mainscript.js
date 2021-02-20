let suggestion = document.querySelector('input[name=showsuggestion]');
let vote = document.querySelector('input[name=vote]');
let last = document.querySelector('input#blim_options_check');
if ( suggestion !== null ) {
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
if ( vote !== null ) {
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

if ( vote_up != null ) {

    document.querySelector('span#vote-up').addEventListener('click', () => {
        send_fetch(parseInt(vote_up.value) + 1, vote_down.value);
    })
}
if ( vote_down != null ) {
    document.querySelector('span#vote-down').addEventListener('click', () => {
        send_fetch(vote_up.value, (parseInt(vote_down.value) + 1));
    })
}
function send_fetch( vote_up, vote_down ) {

    fetch(`${vote_object.ajax_url}?action=update_vote_count&vote_up=${vote_up}&vote_down=${vote_down}&post_id=${parseInt(vote_object.post_id)}`).then(response => {
        if ( response.status === 200 ) {
            return response.json();
        } else {
            throw new Error('Something went wrong on the server!');
        }
    }).then( response => {
        document.querySelector('.voting-box').innerHTML = `<p class="vote-message">${response.success}</p>`;
    }).catch( error => {
        document.querySelector('.voting-box').innerHTML = `<p class="vote-message">${error.error}</p>`;
    })
}