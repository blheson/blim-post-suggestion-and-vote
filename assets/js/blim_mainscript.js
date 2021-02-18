let suggestion = document.querySelector('input[name=showsuggestion]');
let vote = document.querySelector('input[name=vote]');
let last = document.querySelector('input#blim_options_check');
suggestion.addEventListener('change', (e) => {
    if (last.value == 'vote' && vote.checked == true)
        last.value = 'both';
    else if (last.value == 'both' && vote.checked == true)
        last.value = 'vote';
    else if (last.value == 'none' && vote.checked == false)
        last.value = 'suggestion';
    else
        last.value = 'none';
})
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
let front_vote = document.querySelector('input#blim_votes')