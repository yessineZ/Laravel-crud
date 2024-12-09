import Image from "next/image";
import SearchForm from "../../components/SearchForm";
import StartupCard from "@/components/StartupCard";

export default async function Home({ searchParams } : { searchParams : Promise<{query? : string}>}) {
 const query =  (await searchParams).query ; 
 const posts = [
  {
    _id : 1 ,
    _createdAt: new Date() ,
    views : 69 , 
    author : {
      _id : 1 , 
      name : "misty"
    } ,
    description : "mistyBook",
    image : "https://res.cloudinary.com/dj8fq0bd0/image/upload/v1721661637/samples/dessert-on-a-plate.jpg",
    category : "Food" , 
    title : "Misty's Delicious Dessert",
  }
 ] 
 type StartupCardType = {
   _id : number ,
   _createdAt : Date ,
   views : number ,
   author : {
     _id : number ,
     name : string
   } ,
   description : string ,
   image : string ,
   category : string ,
   title : string
 }
 return (
    <>
    <section className="pink_container">
      <h1 className="heading">
        Pitch Your Startup, <br />
        Connect With Entrepreneurs
      </h1>

      <p className="sub-heading !max-w-3xl">
        Submit Ideas , Vote on Pitches , and Get Noticed in Virtual Competitions.
      </p>

      <SearchForm query={query}/>

    </section>


    <section className="section_container">
      <p className="text-30-semibold">
        {query ? `Search Results for ${query} ` : 'All Startups' }
      </p>

      <ul className="mt-7 card_grid">
      {posts && (
        posts
         .filter(post => 
            query ? post.title.toLowerCase().includes(query.toLowerCase()) : true
          )
         .sort((a, b) => Number(b._createdAt) - Number(a._createdAt))
         .map((post : StartupCardType) => (
            <StartupCard key={post._id} post={post}/>
          ))
      )}       
      </ul>
    </section>
    
    </>
   
  );
}