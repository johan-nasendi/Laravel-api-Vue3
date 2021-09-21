import React from 'react';
import '../../App.css';
import Cards from '../Cards';
import CardsVideo from '../CardsVideo';
import HeroSection from '../HeroSection';
import Footer from '../Footer';
import Testimonials from '../Testimonials';
import resumeData from '../../resumeData';

const Home =() => {

  return (
    <>
      <HeroSection />
      <Cards />
      <CardsVideo />
      <Testimonials resumeData={resumeData}/>
      <Footer />
    </>
  );
}

export default Home;