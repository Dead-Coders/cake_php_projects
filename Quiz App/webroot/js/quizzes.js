var QuizzesHelper = {
    onCheck: function(questionKey) {
        var nextQuestion = questionKey + 1;
        var nextElement =  document.getElementById('questionCard' + nextQuestion);
        var currentElem = document.getElementById('questionCard' + questionKey);
        if (nextElement) {
            currentElem.style.display = 'none';
            nextElement.style.display = 'block';
            nextElement.style.visibility = 'hidden';
            window.setTimeout(function() {
                nextElement.style.visibility = 'visible';
            }, 300);
        } else {
            document.getElementById('frmQuiz').submit();
        }
    }
}
