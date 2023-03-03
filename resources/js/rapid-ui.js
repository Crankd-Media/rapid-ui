import { setBasePath } from "@shoelace-style/shoelace/dist/utilities/base-path.js";
setBasePath("/");

import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/alert/alert.js";
import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/button/button.js";
import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/icon/icon.js";
import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/dialog/dialog.js";

import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/tooltip/tooltip.js";

import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/input/input.js";
import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/drawer/drawer.js";
import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/card/card.js";

import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/icon-button/icon-button.js";
import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/tab-group/tab-group.js";
import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/tab-panel/tab-panel.js";
import "https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace/dist/components/tab/tab.js";

import Swal from "sweetalert2";
window.Swal = Swal;
window.SweetalertOptions = {
  confirmButtonText: "Yes, delete it!",
  confirmButtonColor: "#E33430",
  cancelButtonColor: "#6c757d",
  confirmButtonClass: "btn btn-danger",
  cancelButtonClass: "btn btn-lighter",
};

import Alpine from "alpinejs";

import medialibrary from "./alpine-components/medialibrary.ts";
Alpine.data("medialibrary", medialibrary);

Alpine.directive("log", (el, { expression }, { evaluate }) => {
  console.log(evaluate(expression));
});

Alpine.magic("clipboard", () => {
  return (subject) => navigator.clipboard.writeText(subject);
});

Alpine.directive(
  "rapid-slug",
  (el, { expression }, { evaluateLater, effect }) => {
    let setInputValue = evaluateLater(expression);
    effect(() => {
      setInputValue((string) => {
        el.value = string.toLowerCase().replace(/\s+/g, "_");
      });
    });
  }
);
