
const skill = document.getElementById("skill");

let wordIndex = 0;
let charIndex = 0;
let deleting = false;
let text = null;
async function type() {
  if(!text){
    let textFromDB =await fetch("getSkills.php")
    .then((res) => res.text())
    .then((data) => data);
    console.log(textFromDB)

    text = textFromDB
    .split("#")
    .filter((item) => item.trim())
    .map((item) => item.trim().replace(/\.+$/, "").toUpperCase() + ".");
  }

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

const slider = document.querySelectorAll(".Pcard");
console.log(slider);
const pre = document.querySelector("#pre");
const next = document.querySelector("#nxt");
let currItem = Math.floor(slider.length / 2);
console.log(currItem);

function sliderShow() {
  slider[currItem].style.transform = `scale(1) perspective(20px)`;
  slider[currItem].style.zIndex = "1";
  slider[currItem].style.filter = "brightness(100%)";
  slider[currItem].style.opacity = 1;

  let counter = 0;

  for (i = currItem + 1; i < slider.length; i++) {
    counter++;
    console.log(counter);

    slider[i].style.transform =
      `translate(${140 * counter}px,0%) scale(${1 - 0.2 * counter}) perspective(30px) rotateY(-1deg)`;
    slider[i].style.zIndex = `${-counter}`;
    slider[i].style.filter = "brightness(70%)";
    slider[i].style.opacity = counter > 2 ? 0 : 1;
  }

  counter = 0;

  for (i = currItem - 1; i >= 0; i--) {
    counter++;
    slider[i].style.transform =
      `translate(${-140 * counter}px,0%) scale(${1 - 0.2 * counter}) perspective(30px) rotateY(1deg)`;

    slider[i].style.zIndex = `${-counter}`;
    slider[i].style.filter = "brightness(70%)";
    slider[i].style.opacity = counter > 2 ? 0 : 1;
  }
}
pre.onclick = () => {
  if (currItem != 0) {
    currItem--;
    sliderShow();
  }
};
next.onclick = () => {
  if (currItem != slider.length - 1) {
    currItem++;
    sliderShow();
    console.log(currItem);
  }
};

sliderShow();

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
        if (status) {
          status.textContent = "Thanks your message was sent.";
          setInterval(() => {
            status.textContent = "";
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
