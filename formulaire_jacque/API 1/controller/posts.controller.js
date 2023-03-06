const pool =require("../database/index")
const postsController = {

   getAll: async (req, res) =>{
        try{
            const [rows, fields]= await pool.query("select * from etudiant")
            res.json({
                data:rows
            })
        }catch(error){
            console.log(error)
            res.json({
                status:"error"
            })
        }
    },


  getById: async (req, res)=>{
    try {
        const {id} = req.params
        const [rows, fields] = await pool.query("select * from etudiant where id = ?",[id] )
        res.json({
            data: rows
        })
    } catch (error){
        console.log(error)
        res.json({
            status:"error"
        })
    }
  },
  create : async (req, res)=>{
    try{
        const { nom, email, telephone}= req.body
        const sql ="insert into etudiant(nom, email, telephone) values (?,?,?)"
        const [rows,fields] = await pool.query(sql,[nom, email, telephone])
        res.json({
            data:rows
        })
    }catch(error){
        console.log(error)
        res.json({
            status:"error"
        })
    }
  },
  updade : async (req,res)=> {
    try{
    
     const {nom, email, telephone}= req.body
     const{id}= req.params
     const sql="updade etudiant set nom=? ,email=? ,telephone=? where id=?"
     const [rows,fields] = await pool.query(sql,[nom, email, telephone, id])
     res.json({
         data: rows
        })
    }catch (error){
        console.log(error)
        res.json({
            status:"error"
        })
    }
  }
}
module.exports = postsController