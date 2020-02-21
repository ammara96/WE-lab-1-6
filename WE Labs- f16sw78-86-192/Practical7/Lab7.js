(function() {
  const myQuestions = [
    {
      question: "Why so JavaScript and Java have similar name?",
      answers: {
        a: "JavaScript is a stripped-down version of Java",
        b: "JavaScript's syntax is loosely based on Java's",
        c: "They both originated on the island of Java", 
		d: "None of the above" 
      },
      correctAnswer: "b"
    },
    {
      question: "When a user views a page containing a JavaScript program, which machine actually executes the script?",
      answers: {
        a: "The User's machine running a Web browser",
        b: "The Web server",
        c: "A central machine deep within Netscape's corporate offices", 
		d: "None of the abov" 
      },
      correctAnswer: "a"
    },
    {
      question: "______ JavaScript is also called client-side JavaScript.",
      answers: {
        a: "Microsoft",
        b: "Navigator",
        c: "LiveWire",
        d: "Native"
      },
      correctAnswer: "b"
    }, 
	{
      question: "__________ JavaScript is also called server-side JavaScript.",
      answers: {
        a: "Microsoft",
        b: "LiveWire",
        c: "Navigator",
        d: "Native"
      },
      correctAnswer: "b"
    }, 
	{
      question: "What are variables used for in JavaScript Programs?",
      answers: {
        a: "Storing numbers, dates, or other values",
        b: "Varying randomly",
        c: "Causing high-school algebra flashbacks",
        d: "None of the above"
      },
      correctAnswer: "a"
    }, 
	{
      question: "_____ JavaScript statements embedded in an HTML page can respond to user events such as mouse-clicks, form input, and page navigation.",
      answers: {
        a: "Client-side",
        b: "Server-side",
        c: "Local",
        d: "Native"
      },
      correctAnswer: "a"
    }, 
	{
      question: "Javascript is a ________ language? ",
      answers: {
        a: "Cliet-side ",
        b: "Server-side ",
        c: "Both ",
        d: "None of the above"
      },
      correctAnswer: "a"
    }, 
	{
      question: "Which of the following can't be done with client-side JavaScript? ",
      answers: {
        a: "Validating a form",
        b: "Sending a form's contents by email",
        c: "Storing the form's contents to a database file on the server",
        d: "None of the above"
      },
      correctAnswer: "c"
    }, 
	{
      question: "Which of the following are capabilities of functions in JavaScript?",
      answers: {
        a: "Return a value",
        b: "Accept parameters and Return a value",
        c: "Accept parameters",
        d: "None of the above"
      },
      correctAnswer: "c"
    }, 
	{
      question: "Which of the following is not a valid JavaScript variable name?",
      answers: {
        a: "2names",
        b: "_first_and_last_names",
        c: "FirstAndLast",
        d: "None of the above"
      },
      correctAnswer: "a"
    }
  ];

  
  
  
  
    function buildQuiz() {
    // we'll need a place to store the HTML output
    const output = [];

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // we'll want to store the list of answer choices
      const answers = [];

      // and for each available answer...
      for (letter in currentQuestion.answers) {
        // ...add an HTML radio button
        answers.push(
          `<label>
             <input type="checkbox" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
           </label>`
        );
      }

      // add this question and its answers to the output
      output.push(
        `<div class="slide">
           <div class="question"> ${currentQuestion.question} </div>
           <div class="answers"> ${answers.join("")} </div>
         </div>`
      );
    });

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join("");
  }
  
  function showResults() {
    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll(".answers");

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // if answer is correct
      if (userAnswer === currentQuestion.correctAnswer) {
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].style.color = "lightgreen";
      } else {
        // if answer is wrong or blank
        // color the answers red
        answerContainers[questionNumber].style.color = "red";
      }
    });

    // show number of correct answers out of total
    resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
  }
  
  
  function showSlide(n) {
    slides[currentSlide].classList.remove("active-slide");
    slides[n].classList.add("active-slide");
    currentSlide = n;
    
    if (currentSlide === 0) {
      previousButton.style.display = "none";
    } else {
      previousButton.style.display = "inline-block";
    }
    
    if (currentSlide === slides.length - 1) {
      nextButton.style.display = "none";
      submitButton.style.display = "inline-block";
    } else {
      nextButton.style.display = "inline-block";
      submitButton.style.display = "none";
    }
  }

  function showNextSlide() {
    showSlide(currentSlide + 1);
  }

  function showPreviousSlide() {
    showSlide(currentSlide - 1);
  }
  
  function showFirstSlide() {
    showSlide(0);
  }

  function showLastSlide() {
    showSlide(9);
  }

  const quizContainer = document.getElementById("quiz");
  const resultsContainer = document.getElementById("results");
  const submitButton = document.getElementById("submit");

  // display quiz right away
  buildQuiz();

  const previousButton = document.getElementById("previous");
  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  const firstButton = document.getElementById("first");
  const lastButton = document.getElementById("last");
  let currentSlide = 0;

  showSlide(0);

  // on submit, show results
  submitButton.addEventListener("click", showResults);
  previousButton.addEventListener("click", showPreviousSlide);
  nextButton.addEventListener("click", showNextSlide); 
  firstButton.addEventListener("click", showFirstSlide);
  lastButton.addEventListener("click", showLastSlide);
})();

	