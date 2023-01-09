import AgileAPI from "../api/AgileAPI.js";
import DropZone from "./DropZone.js";
import Item from "./Item.js";

export default class Column {
	constructor(id, title) {
		const topDropZone = DropZone.createDropZone();

		this.elements = {};
		this.elements.root = Column.createRoot();
		this.elements.title = this.elements.root.querySelector(".agile__column-title");
		this.elements.items = this.elements.root.querySelector(".agile__column-items");
		this.elements.addItem = this.elements.root.querySelector(".agile__add-item");

		this.elements.root.dataset.id = id;
		this.elements.title.textContent = title;
		this.elements.items.appendChild(topDropZone);

		this.elements.addItem.addEventListener("click", () => {
			const newItem = AgileAPI.insertItem(id, "");

			this.renderItem(newItem);
		});

		AgileAPI.getItems(id).forEach(item => {
			this.renderItem(item);
		});
	}

	static createRoot() {
		const range = document.createRange();

		range.selectNode(document.body);

		return range.createContextualFragment(`
			<div class="agile__column">
				<div class="agile__column-title"></div>
				<div class="agile__column-items"></div>
				<button class="agile__add-item" type="button">+ Add</button>
			</div>
		`).children[0];
	}

	renderItem(data) {
		const item = new Item(data.id, data.content);

		this.elements.items.appendChild(item.elements.root);
	}
}