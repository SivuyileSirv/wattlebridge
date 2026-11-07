// ============================================================
// WATTLEBRIDGE — HEADER INTERACTIONS
// ============================================================

export function initHeader() {
  const header = document.querySelector("#site-header");

  if (!header) {
    return;
  }

  const toggle = header.querySelector(".site-header__toggle");
  const navigation = header.querySelector("#primary-navigation");

  const updateScrollState = () => {
    // Only return to transparent at the actual top.
    header.classList.toggle("is-scrolled", window.scrollY > 0);
  };

  const closeMenu = () => {
    if (!toggle) {
      return;
    }

    header.classList.remove("is-menu-open");
    toggle.setAttribute("aria-expanded", "false");
    toggle.setAttribute("aria-label", "Open navigation");
  };

  updateScrollState();

  window.addEventListener("scroll", updateScrollState, {
    passive: true,
  });

  if (!toggle || !navigation) {
    return;
  }

  toggle.addEventListener("click", () => {
    const isOpen = header.classList.toggle("is-menu-open");

    toggle.setAttribute("aria-expanded", String(isOpen));
    toggle.setAttribute(
      "aria-label",
      isOpen ? "Close navigation" : "Open navigation",
    );
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      closeMenu();
    }
  });

  document.addEventListener("click", (event) => {
    if (!header.contains(event.target)) {
      closeMenu();
    }
  });

  navigation.addEventListener("click", (event) => {
    if (event.target.closest("a")) {
      closeMenu();
    }
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth >= 1024) {
      closeMenu();
    }
  });
}
