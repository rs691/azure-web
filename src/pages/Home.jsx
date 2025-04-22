import {Link} from "react-router-dom";

export default function Home() {
    return (
      <>
     
        <section class="text-base-content dark:bg-gray-800  px-6 py-8 ring ring-gray-900/5">
        <div className="container flex flex-col items-center px-4 py-8 mx-auto text-center md:px-10 lg:px-32 xl:max-w-3xl">
          <h1 className="text-4xl font-bold leading-none sm:text-6xl">
            Hello, My name is Rob and
            <span className="text-fuchsia-600"> I am a software developer.</span>
          </h1>
          <p className="text-base-content px-8 mt-8 mb-12 text-xl font-semibold">Please feel free to skip right to my resume or other docs!</p>
          <div className="flex flex-wrap justify-center">
            <Link to="/resume.pdf" target="_blank" className="px-8 py-3 m-2 text-lg font-semibold rounded text-base-content border-2  border-base-content hover:bg-fuchsia-600">
              Resume
            </Link>
            
            <button className="text-base-content px-8 py-3 m-2 text-lg  rounded border-2 border-base-content">
              Learn more
            </button>
          </div>
        </div>
      </section>
      
      </>  
    );
}