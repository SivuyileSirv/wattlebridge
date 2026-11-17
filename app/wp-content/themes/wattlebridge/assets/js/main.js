// ============================================================
// WATTLEBRIDGE — MAIN JAVASCRIPT
// ============================================================

import { initHeader } from "./modules/header.js";
import { initButtonAnimation } from "./modules/button-animation.js";

const init = () => {
  initHeader();
  initButtonAnimation();
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", init, {
    once: true,
  });
} else {
  init();
}
