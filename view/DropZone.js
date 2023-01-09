import AgileAPI from "../api/AgileAPI.js";

export default class DropZone {
	static createDropZone() {
		const range = document.createRange();

		range.selectNode(document.body);

		const dropZone = range.createContextualFragment(`
			<div class="agile__dropzone"></div>
		`).children[0];

		dropZone.addEventListener("dragover", e => {
			e.preventDefault();
			dropZone.classList.add("agile__dropzone--active");
		});

		dropZone.addEventListener("dragleave", () => {
			dropZone.classList.remove("agile__dropzone--active");
		});

		dropZone.addEventListener("drop", e => {
			e.preventDefault();
			dropZone.classList.remove("agile__dropzone--active");

			const columnElement = dropZone.closest(".agile__column");
			const columnId = Number(columnElement.dataset.id);
			const dropZonesInColumn = Array.from(columnElement.querySelectorAll(".agile__dropzone"));
			const droppedIndex = dropZonesInColumn.indexOf(dropZone);
			const itemId = Number(e.dataTransfer.getData("text/plain"));
			const droppedItemElement = document.querySelector(`[data-id="${itemId}"]`);
			const insertAfter = dropZone.parentElement.classList.contains("agile__item") ? dropZone.parentElement : dropZone;

			if (droppedItemElement.contains(dropZone)) {
				return;
			}

			insertAfter.after(droppedItemElement);
			AgileAPI.updateItem(itemId, {
				columnId,
				position: droppedIndex
			});
		});

		return dropZone;
	}
}