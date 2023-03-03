export default () => ({
    images: [],
    selected: [],
    max_selected: 1,
    detail: null,
    dropingFile: false,
    tabs: [
        {
            name: "Media Library",
            component: "library",
        },
        {
            name: "Upload",
            component: "upload",
        },
    ],
    selectedTab: "library",
    init() {},
    async listImages() {
        const response = await axios.get("/media");
        this.images = response.data.media;
    },
    handleFileDrop(event) {
        console.log(event);

        // if event  element type

        // upload file
        this.dropingFile = true;
        const formData = new FormData();

        if (event.dataTransfer) {
            // file drop event
            formData.append("file", event.dataTransfer.files[0]);
        } else {
            // file upload event
            formData.append("file", event.target.files[0]);
        }

        // post form to api media upload
        axios
            .post("/media", formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((response) => {
                this.dropingFile = false;
                // this.images.push(response.data.media);

                this.listImages();
                this.selectedTab = "library";
            });
    },
    setupMediaLibrary(detail) {
        this.$refs.drawer.show();

        this.max_selected = detail.max_selected;

        this.listImages();

        if (typeof detail.callback === "function") {
            this.detail = detail;
        }
    },
    selectImage(image) {
        // create new image object with the id and url

        const newImage = {
            id: image.id,
            url: image.original_url,
        };

        // check if image is already selected if not add it to the selected array
        if (!this.selected.some((i) => i.id === newImage.id)) {
            // if max selected is 1 then empty the selected array
            if (this.max_selected === 1) {
                this.selected = [];
            }
            this.selected.push(newImage);
        } else {
            // if image is already selected remove it from the selected array
            // this.selected = this.selected.filter((i) => i.id !== newImage.id);
        }
    },
    insertImage() {
        console.log("insertImage");
        console.log(this.selected);
        if (this.detail) {
            this.detail.callback(this.selected);
        }
        // close media library
        window.dispatchEvent(new CustomEvent("close-medialibrary"));
    },
    isSelected(image) {
        console.log(image.id);
        console.log(this.selected);
        if (this.selected.length === 0) {
            return false;
        }
        return this.selected.some((i) => i.id === image.id);
    },
    openSelectFile() {
        document.getElementById("file").click();
    },
});
