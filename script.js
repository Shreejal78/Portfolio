const text = ["FRONTEND DESIGNER.", "BACKEND DEVELOPER.", "WEB DESIGNER."];

const skill = document.getElementById("skill");

let wordIndex = 0;
let charIndex = 0;
let deleting = false;

function type() {
  const currentWord = text[wordIndex];

  if (!deleting) {
    skill.textContent = currentWord.substring(0, charIndex + 1);
    charIndex++;

    if (charIndex === currentWord.length) {
      deleting = true;
      setTimeout(type, 2000);
      return;
    }

    setTimeout(type, 120);
  } else {
    skill.textContent = currentWord.substring(0, charIndex - 1);
    charIndex--;
    if (charIndex === 0) {
      deleting = false;
      wordIndex = (wordIndex + 1) % text.length;
      setTimeout(type, 500);
      return;
    }
    setTimeout(type, 80);
  }
}

type();

(function () {
  var form = document.getElementById("contact-form");
  if (!form) return;
  var status = document.getElementById("status");
  var button = form.querySelector('button[type="submit"]');
  form.addEventListener("submit", async function (event) {
    event.preventDefault();
    if (status) status.textContent = "Sending…";
    if (button) button.disabled = true;
    try {
      var response = await fetch("https://api.w3forms.com/submit", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify(Object.fromEntries(new FormData(form))),
      });
      var result = await response.json();
      if (response.ok && result.success) {
        if (status){
          status.textContent = "Thanks your message was sent.";
          setInterval(() => {
            status.textContent = ''
          }, 2000);
        }
        form.reset();
      } else if (status) {
        status.textContent =
          result.message || "Something went wrong. Please try again.";
      }
    } catch (_err) {
      if (status) status.textContent = "Network error. Please try again.";
    } finally {
      if (button) button.disabled = false;
    }
  });
})();
