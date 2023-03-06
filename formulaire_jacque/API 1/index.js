const express = require("express")
const cors = require('cors')

const app =express()

require('dotenv').config()
app.use(cors())
const postsRouter = require('./routes/posts.router')

app.use(express.urlencoded({extended: false}))
app.use(express.json())

app.use("/api/v1/posts", postsRouter)

const port = 3000

app.listen(port,()=> {
    console.log("server ruinning...")
})