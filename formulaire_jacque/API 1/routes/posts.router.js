const express =require("express")
const router =express.Router()

const postsController =require("../controller/posts.controller")

router.get("/", postsController.getAll)
router.get("/:id", postsController.getById)
router.post("/createpost", postsController.create)
router.put("/updadeput", postsController.updade)

module.exports= router