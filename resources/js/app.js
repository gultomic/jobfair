import "./bootstrap";
import "moment";

Alpine.data("dashboard", (data) => ({
    init() {
        let token = localStorage.getItem("token");
        if (token === null || token !== data.token) {
            // localStorage.setItem("token", data.token);
        }
    },
}));

Alpine.data("checkin", (data) => ({
    modalOpen: false,
    alertOpen: false,
    loadingOpen: true,
    message: "",
    formLogin: {
        email: "",
        password: "",
    },
    info: "",
    jobfair: "",
    lokasi: "",
    tanggal: "",
    record: "",
    userName: "",
    status: false,
    init() {
        let token = localStorage.getItem("token");

        setTimeout(() => {
            if (token !== null) {
                this.eventCheckin({
                    token: token,
                    eid: data.eid,
                });
            } else {
                this.modalOpen = true;
            }
        }, 500);
    },
    async eventCheckin(payload) {
        await window
            .axios({
                method: "POST",
                url: "/api/checkin",
                data: JSON.stringify({
                    event_id: payload.eid,
                }),
                headers: {
                    Accept: "application/json",
                    Authorization: `Bearer ${payload.token}`,
                    "content-type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                credentials: "same-origin",
            })
            .then((response) => {
                if (response.data.status == true) {
                    this.loadingOpen = false;
                    this.info = response.data.event.info;
                    this.jobfair = response.data.event.jobfair;
                    this.lokasi = response.data.event.lokasi;
                    this.tanggal = response.data.event.tanggal;
                    this.userName = response.data.event.userName;
                    this.record = response.data.event.record;
                    // .format(
                    //     "MMMM Do YYYY, h:mm:ss a"
                    // );
                }
                console.log(response.data);
            })
            .catch((error) => {
                this.message = error.response.data.message;
                this.alertOpen = true;
            });
    },
    async loginSubmit() {
        await window
            .axios({
                method: "POST",
                url: "/api/login",
                data: JSON.stringify({
                    email: this.formLogin.email,
                    password: this.formLogin.password,
                }),
                headers: {
                    Accept: "application/json",
                    "content-type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                credentials: "same-origin",
            })
            .then((response) => {
                if (response.data.status) {
                    localStorage.setItem("token", response.data.token);
                    this.modalOpen = false;
                }
                console.log(response.data);
            })
            .catch((error) => {
                this.message = error.response.data.message;
                this.alertOpen = true;
            });
    },
}));
