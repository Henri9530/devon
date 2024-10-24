
const displayProf = document.querySelector('.profile-js');

const teacher = [
  {
  name: 'Boss Thanos',
  image: 'Profiles User/Teacher 1.png'
}, {
  name: 'Boss Thanos',
  image: 'Profiles User/Teacher 2.png'
}, {
  name: 'Boss Thanos',
  image: 'Profiles User/Teacher 3.png'
}, {
  name: 'Boss Thanos',
  image: 'Profiles User/Teacher 4.png'
}, {
  name: 'Boss Thanos',
  image: 'Profiles User/Teacher 5.png'
}, {
  name: 'Boss Thanos',
  image: 'Profiles User/Teacher 6.png'
}, {
  name: 'Boss Thanos',
  image: 'Profiles User/Teacher 7.png'
}, {
  name: 'Boss Thanos',
  image: 'Profiles User/Teacher 8.png'
}
];

let profileTeach = '';

teacher.forEach((teach) => {
  profileTeach += `
    <div class="col my-2">
      <div class="">
        <img src="${teach.image}" class="img-thumbnail image-height" alt="Teacher-pic">
        <div>${teach.name}</div>
      </div>
    </div>
  `;
});


displayProf.innerHTML = profileTeach;
