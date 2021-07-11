// const config = require("../config");
const { Router } = require("express");

const router = Router();

// Initialize Controller
const articlesController = require("../controllers/commentsController");

// Get All
router.get("/comments/:id", articlesController.list);

// Create
router.post("/comments/:id", articlesController.create);

// Update
// router.put("/comments/:id", articlesController.update);

// Delete
router.delete("/comments/:id", articlesController.delete);

module.exports = router;
