import React from 'react';
import './Cards.css';
import CardItem from './CardItem';

function Cards() {
  return (
    <>
     <div className='cards'>
      <h2>Lorem ipsum</h2>
      <div className='cards__container'>
        <div className='cards__wrapper'>
          <ul className='cards__items'>
            <CardItem
              src='images/img-1-1.jpg'
              text='Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
              label='Explore'
              path='/services'
            />
            <CardItem
              src='images/img-2-2.jpg'
              text='Lorem Ipsum is simply dummy text of the printing and typesetting industry'
              label='Explore'
              path='/services'
            />
          </ul>
          <ul className='cards__items'>
            <CardItem
              src='images/img-3-3.jpg'
              text='Lorem Ipsum is simply dummy text of the printing and typesetting industry'
              label='Explore'
              path='/services'
            />
            <CardItem
              src='images/img-4-4.jpg'
              text='Lorem Ipsum is simply dummy text of the printing and typesetting industry'
              label='Explore'
              path='/products'
            />
            <CardItem
              src='images/img-5-5.jpg'
              text='Lorem Ipsum is simply dummy text of the printing and typesetting industry'
              label='Explore'
              path='/sign-up'
            />
          </ul>
        </div>
      </div>
    </div>
    </>
  );
}

export default Cards;