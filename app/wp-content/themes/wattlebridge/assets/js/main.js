// ============================================================
// WATTLEBRIDGE — MAIN JAVASCRIPT
// ============================================================

import { initHeader } from "./modules/header.js";

const init = () => {
  initHeader();
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", init, { once: true });
} else {
  init();
}
