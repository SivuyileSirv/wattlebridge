// ============================================================
// WATTLEBRIDGE — POSITION-AWARE BUTTON ANIMATION
// ============================================================

const BUTTON_SELECTOR = [
  ".button",
  ".pathways__button",
  ".site-footer__cta-button",
  ".approach__cta-link",
].join(", ");

// ------------------------------------------------------------
// Calculate the circular reveal diameter
// ------------------------------------------------------------

const updateRevealPosition = (button, clientX, clientY) => {
  const rect = button.getBoundingClientRect();

  const x = clientX - rect.left;
  const y = clientY - rect.top;

  const farthestX = Math.max(x, rect.width - x);
  const farthestY = Math.max(y, rect.height - y);

  const radius = Math.hypot(farthestX, farthestY);
  const diameter = Math.ceil(radius * 2 + 2);

  button.style.setProperty("--x", `${x}px`);
  button.style.setProperty("--y", `${y}px`);
  button.style.setProperty("--button-reveal-size", `${diameter}px`);
};

// ------------------------------------------------------------
// Initialize individual buttons
// ------------------------------------------------------------

const initButton = (button) => {
  if (button.dataset.awareInitialized === "true") {
    return;
  }

  button.dataset.awareInitialized = "true";

  const setCenterPosition = () => {
    const rect = button.getBoundingClientRect();

    updateRevealPosition(
      button,
      rect.left + rect.width / 2,
      rect.top + rect.height / 2,
    );
  };

  setCenterPosition();

  button.addEventListener("pointerenter", (event) => {
    if (event.pointerType === "mouse" || event.pointerType === "pen") {
      updateRevealPosition(button, event.clientX, event.clientY);
    }
  });

  button.addEventListener("pointermove", (event) => {
    if (event.pointerType === "mouse" || event.pointerType === "pen") {
      updateRevealPosition(button, event.clientX, event.clientY);
    }
  });

  button.addEventListener("focus", setCenterPosition);
};

// ------------------------------------------------------------
// Initialize all CTA buttons
// ------------------------------------------------------------

export const initButtonAnimation = () => {
  const buttons = document.querySelectorAll(BUTTON_SELECTOR);

  buttons.forEach(initButton);
};
